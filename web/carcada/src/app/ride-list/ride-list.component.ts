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

  constructor(private rideService: RideService) { }

  ngOnInit() {
    this.rideService.getRides().then((rides) => {
      this.rideList = rides;
      this.foundResults = rides.length;
    });
  }
}
