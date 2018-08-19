import { Ride } from '../../models/Ride';

export interface RidesSearchState {
  results: Array<Ride> | null;
}
