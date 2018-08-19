import { Ride } from '../../models/Ride';

export interface SearchRidesState {
  results: Array<Ride> | null;
}
