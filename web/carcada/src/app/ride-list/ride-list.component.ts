import {Component, Input, OnInit} from '@angular/core';
import {Ride} from "./ride";

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  rideList: Ride[];

  foundResults = 200;

  constructor() { }

  ngOnInit() {
    this.rideList = [
      {
        id: 1,
        img: '/assets/profile.jpg',
        offeredBy: 'Mike',
        type: 'Privatwagen',
        price: 5.50,
        departure: '2017-06-04 10:00',
        departureCity: 'Munich',
        arrival: '2017-06-04 14:00',
        arrivalCity: 'Karlsruhe',
        seatsFree: 2,
        userRating: 4.2
      },
      {
        id: 2,
        img: '/assets/profile.jpg',
        offeredBy: 'Kevin',
        type: 'Mietwagen',
        price: 25.99,
        departure: '2017-06-07 11:00',
        departureCity: 'Berlin',
        arrival: '2017-06-04 17:30',
        arrivalCity: 'Hamburg',
        seatsFree: 3,
        userRating: 3.7
      }
    ]
  }
}
