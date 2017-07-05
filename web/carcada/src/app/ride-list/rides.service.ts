import {Injectable} from "@angular/core";
import {Ride} from "./ride";
import {Http} from "@angular/http";
import 'rxjs/add/operator/toPromise';
/**
 * Created by michael_hunger on 05/07/17.
 */

@Injectable()
export class RideService {

  private rideUrl = '/api/rides';

  constructor(private http: Http) {
  }

  getRides(): Promise<Ride[]> {
    return this.http.get(this.rideUrl)
      .toPromise()
      .then(response => response.json() as Ride[])
      .catch(this.handleError);
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
