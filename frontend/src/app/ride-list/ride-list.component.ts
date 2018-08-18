import { Component, OnInit } from '@angular/core';
import { Ride } from '../models/Ride';
import { RideService } from '../services/rides.service';
import { IFilterCondition } from '../interfaces/IFilterCondition';

interface IMomentJs {};

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  rideList: Ride[];

  foundResults = 0;

  isFilterFormVisible = false;

  filterConditions = {
    from: 'Munich',
    to: 'Geneva',
    travelDay: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
    seats: 1,
  };

  constructor(private rideService: RideService) { }

  ngOnInit() {
    this.rideService.findRides().then((rides) => {
      this.rideList = rides;
      this.foundResults = rides.length;
    });
  }

  toggleFilterForm() {
    this.isFilterFormVisible = !this.isFilterFormVisible;
  }

  filterRideList( ) {
    const filters : Array<IFilterCondition> = [
      {name: 'from', value: this.filterConditions.from},
      {name: 'to', value: this.filterConditions.to},
      {name: 'travelDay', value: this.dateToString(this.filterConditions.travelDay)},
      {name: 'seats', value: this.filterConditions.seats},
    ];

    this.rideService.findRides(filters).then((rides) => {
      this.rideList = rides;
      this.foundResults = rides.length;
    });
  }

  public getFilterTextSummary() {
    const getSeats = (count) => count > 1 ? `${count} Personen` : `${count} Person`;
    return `${this.filterConditions.from} • ${this.filterConditions.to} • ${this.dateToString(this.filterConditions.travelDay)} • ${getSeats(this.filterConditions.seats)} `
  }

  private dateToString(date: Date) {
    return `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`;
  }

  public setDepartureFilter(value: string) {
    this.filterConditions.from = value;
  }
  public setDestinationFilter(value: string) {
    this.filterConditions.to = value;
  }
  public setTravelDayFilter(value: IMomentJs) {
    const date = <any>value;
    this.filterConditions.travelDay = date;
  }
  public setSeatsFilter(value) {
    this.filterConditions.seats = value;
  }
}
