import {Injectable} from '@angular/core';
import {Ride} from '../models/Ride';
import {Http} from '@angular/http';
import { BackendBaseService } from './backend-base.service';
import { IRidesSearchParameters } from '../state/ride-search/rides-search.actions';

@Injectable()
export class RidesSearchService extends BackendBaseService {

  private rideSearchUrl = '/api/ridesearch';

  private rideList : any = [];

  constructor(protected http: Http) {
    super(http, '/ridesearch');
  }

  public findRides(filterConditions: IRidesSearchParameters) {
    const urlParameters = this.filterConditionsToUrlParameters(filterConditions);
    const encodedUrlParameters = encodeURI(urlParameters);

    return this.http.get(`${this.rideSearchUrl}?${encodedUrlParameters}`);
  }

  private filterConditionsToUrlParameters(filter : IRidesSearchParameters) : string {
    return Object.keys(filter)
      .reduce((parameterList : [string], filterKey) => {
          parameterList.push(`${filterKey}=${filter[filterKey]}`);
          return parameterList;
        },
        [] as Array<string>)
      .join('&')
  }

  getRide(rideId: number): Ride|undefined {
    return this.rideList.find(entry => entry.id === rideId);
  }

  handleError(error: any): Promise<any> {
    return Promise.reject(error.message || error);
  }
}
