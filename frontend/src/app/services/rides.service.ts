import {Injectable} from '@angular/core';
import {Ride} from '../models/ride.model';
import {Http} from '@angular/http';
import 'rxjs/add/operator/toPromise';
/**
 * Created by michael_hunger on 05/07/17.
 */

@Injectable()
export class RideService {

  private rideUrl = '/api/rides';

  /**
    * Hold recently fetched entries
    */
  private rideList : any = [];

  constructor(private http: Http) {}

  getRides(): Promise<Ride[]> {
    return this.http.get(this.rideUrl)
      .toPromise()
      .then((response) => {
        this.rideList = response.json() as Ride[];
        return this.rideList;
      })
      .catch(this.handleError);
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
