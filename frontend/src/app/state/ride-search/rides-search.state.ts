import { Ride } from '../../models/Ride';
import { IRidesSearchParameters } from './rides-search.actions';

export interface RidesSearchState {
  filter: IRidesSearchParameters,
  results: Array<Ride> | null;
  failed: boolean;
}
