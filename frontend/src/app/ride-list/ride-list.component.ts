import { Component, OnInit } from '@angular/core';
import { RidesSearchService } from '../services/rides-search.service';
import { Store } from '@ngrx/store';
import { RootState } from '../state/root.state';
import { filter, map } from 'rxjs/operators';
import { RidesSearch, IRidesSearchParameters } from '../state/ride-search/rides-search.actions';

interface IMomentJs {};

@Component({
  selector: 'app-ride-list',
  templateUrl: './ride-list.component.html',
  styleUrls: ['./ride-list.component.css']
})
export class RideListComponent implements OnInit {

  public ridesSearchResults$ = this.store
            .select(state => state.ridesSearch)
            .pipe(
              filter(state=>state.results !== null),
              map(ridesSearch => ridesSearch.results)
            );
  public rideSearchFailed$ = this.store
            .select(state => state.ridesSearch)
            .pipe(map(ridesSearch => ridesSearch.failed));

  foundResults = 0;

  isFilterFormVisible = false;

  filterConditions = {
    from: 'Munich',
    to: 'Geneva',
    travelDay: new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
    seats: 1,
  };

  constructor(private rideService: RidesSearchService,
              private store: Store<RootState>) { }

  ngOnInit() {
  }

  toggleFilterForm() {
    this.isFilterFormVisible = !this.isFilterFormVisible;
  }

  filterRideList( ) {
    const parameters: IRidesSearchParameters = {
      from: this.filterConditions.from,
      to: this.filterConditions.to,
      travelDay: this.dateToString(this.filterConditions.travelDay),
      seats: this.filterConditions.seats,
    };

    this.store.dispatch(new RidesSearch(parameters));
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
