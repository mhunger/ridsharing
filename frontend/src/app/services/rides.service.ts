import {Injectable} from '@angular/core';
import {Ride} from '../models/Ride';
import {Http} from '@angular/http';

import { IFilterCondition } from '../interfaces/IFilterCondition';

@Injectable()
export class RideService {

  private rideUrl = '/api/rides';
  private rideSearchUrl = '/api/ridesearch';

  /**
    * Hold recently fetched entries
    */
  private rideList : any = [];

  constructor(private http: Http) {}

  private findAllRides(): Promise<Ride[]> {
    return this.http.get(this.rideUrl)
      .toPromise()
      .then((response) => {
        this.rideList = response.json() as Ride[];
        return this.rideList;
      })
      .catch(this.handleError);
  }

  public findRides(filterConditions? : Array<IFilterCondition>) : Promise<Ride[]> {
    if(!filterConditions){
      return this.findAllRides();
    }

    const urlParameters = this.filterConditionsToUrlParameters(filterConditions);
    const encodedUrlParameters = encodeURI(urlParameters);

    return this.http.get(`${this.rideSearchUrl}?${encodedUrlParameters}`)
      .toPromise()
      .then((response) => {
        this.rideList = response.json() as Ride[];
        return this.rideList;
      })
      .catch(this.handleError);
  }

  private filterConditionsToUrlParameters(filter : Array<IFilterCondition>) : string {
    return filter
      .reduce((parameterList : [string], filter : IFilterCondition) => {
          parameterList.push(`${filter.name}=${filter.value?filter.value:''}`);
          return parameterList;
        }, [] as [string])
      .join('&')
  }

  /**
   * Retrieve ride from recently fetched elements
   * TODO: Fetch ride when it was not found
   */
  getRide(rideId: number): Ride|undefined {
    return this.rideList.find(entry => entry.id === rideId);
  }

  /**
   *
   * @param error
   * @returns {Promise<never>}
   */
  handleError(error: any): Promise<any> {
    return Promise.reject(error.message || error);
  }
}
