import { Ride } from '../../models/Ride';

export interface RideSearchState {
  results: Array<Ride> | null;
}
