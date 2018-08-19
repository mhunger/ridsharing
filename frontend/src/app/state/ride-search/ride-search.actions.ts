import { Ride } from "../../models/Ride";

const RIDES_SEARCH_ACTION_PREFIX = 'SearchRides';

export class RidesSearch {
  public static type: string = RIDES_SEARCH_ACTION_PREFIX;
}

export class RidesSearchSuccess {
  public static type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Success`;
  public payload: Array<Ride>;
}

export class RidesSearchFailure {
  public static type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Failure`;
}
