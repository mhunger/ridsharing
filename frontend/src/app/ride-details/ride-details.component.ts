import { Component, OnInit } from '@angular/core';
import { Ride } from '../models/Ride';

@Component({
  selector: 'app-ride-details',
  templateUrl: './ride-details.component.html',
  styleUrls: ['./ride-details.component.css']
})
export class RideDetailsComponent implements OnInit {

  public ride: Ride = <any>{};

  constructor() {
    this.ride.id = 1;
  }

  ngOnInit() {}
}
