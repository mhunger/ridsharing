import {Component, Input, OnInit} from '@angular/core';
import {Ride} from './ride';
import {RideService} from './rides.service';

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  rideList: Ride[];

  foundResults = 200;

  constructor(private rideService: RideService) { }

  ngOnInit() {
    this.rideService.getRides().then(rides => this.rideList = rides);
  }
}
