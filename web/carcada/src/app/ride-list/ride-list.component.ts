import { Component, Input, OnInit } from '@angular/core';
import { Ride } from './ride.model';
import { RideService } from './rides.service';

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  rideList: Ride[];

  foundResults = 0;

  fetching = false;

  constructor(private rideService: RideService) { }

  ngOnInit() {
    this.fetching = true;

    this.rideService.getRides().then((rides) => {
      this.rideList = rides;
      this.foundResults = rides.length;
      this.fetching = false;
    });
  }
}
