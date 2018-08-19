import { Ride } from "../../models/Ride";

const SEARCH_RIDES_ACTION_PREFIX = 'SearchRides';

export class SearchRides {
  public static type: string = SEARCH_RIDES_ACTION_PREFIX;
}

export class SearchRidesSuccess {
  public static type: string = `${SEARCH_RIDES_ACTION_PREFIX}.Success`;
  public payload: Array<Ride>;
}

export class SearchRidesFailure {
  public static type: string = `${SEARCH_RIDES_ACTION_PREFIX}.Failure`;
}
