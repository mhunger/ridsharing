import {User} from "./user.model";
/**
 * Created by michael_hunger on 04/07/17.
 */

export class Ride {
   /** TAURUS-PROPERTY */
   id: number;

   offeredBy: User;

   type: string;

   price: number;

   departure: string;

   from: string;

   to: string;

   travelDay: string;

   departureTime: string;

   arrivalTime: string;

   seats: number;
}
