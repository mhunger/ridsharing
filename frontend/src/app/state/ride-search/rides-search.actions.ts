import { Ride } from "../../models/Ride";
import { Response } from '@angular/http';

const RIDES_SEARCH_ACTION_PREFIX = 'RidesSearch';

export interface IRidesSearchParameters {
  from: string;
  to: string;
  travelDay: string;
  seats: number;
}

export class RidesSearch {
  public static type: string = RIDES_SEARCH_ACTION_PREFIX;
  public type: string = RIDES_SEARCH_ACTION_PREFIX;

  constructor(private payload?: IRidesSearchParameters) {
    // empty
  }
}

export class RidesSearchSuccess {
  public static type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Success`;
  public type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Success`;
  public payload: Array<Ride>;

  constructor(response: Response) {
    this.payload = response.json();
  }
}

export class RidesSearchFailure {
  public static type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Failure`;
  public type: string = `${RIDES_SEARCH_ACTION_PREFIX}.Failure`;
}
