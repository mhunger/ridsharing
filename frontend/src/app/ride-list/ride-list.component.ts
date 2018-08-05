import { Component, Input, OnInit } from '@angular/core';
import { Ride } from '../models/Ride';
import { RideService } from '../services/rides.service';

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  rideList: Ride[];

  foundResults = 0;

  isFilterFormVisible = false;

  filterInitialDepartureDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
  filterPassengerCount = 1;

  constructor(private rideService: RideService) { }

  ngOnInit() {
    this.rideService.getRides().then((rides) => {
      this.rideList = rides;
      this.foundResults = rides.length;
    });
  }

  toggleFilterForm() {
    this.isFilterFormVisible = !this.isFilterFormVisible;
  }
}
