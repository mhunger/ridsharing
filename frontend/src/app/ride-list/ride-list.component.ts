import { Component, OnInit } from '@angular/core';
import { Store } from '@ngrx/store';
import { RootState } from '../state/root.state';
import { filter, map, first } from 'rxjs/operators';
import { RidesSearch, RidesSearchFilterUpdate } from '../state/ride-search/rides-search.actions';
import { Observable } from 'rxjs';

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
  public filterSummary$: Observable<string> = this.store
    .select(state => state.ridesSearch)
    .pipe(
      map(ridesSearch => ridesSearch.filter),
      map(filterParams => {
        const getSeats = (count) => count > 1 ? `${count} Personen` : `${count} Person`;
        return `${filterParams.from} • ${filterParams.to} • ${filterParams.travelDay} • ${getSeats(filterParams.seats)} `
      })
    );

  public foundResults = 0;
  public isFilterFormVisible = false;

  constructor(private store: Store<RootState>) {
  }

  ngOnInit() {
    this.store.dispatch(new RidesSearchFilterUpdate({
      from: 'Munich',
      to: 'Geneva',
      travelDay: '2018-08-30',
      seats: 1,
    }));
    this.filterRideList();
  }

  public hideFilterPanel() {
    this.isFilterFormVisible = false;
  }

  public hideFilterAndSearch() {
    this.hideFilterPanel();
    this.filterRideList();
  }

  public showFilterPanel() {
    this.isFilterFormVisible = true;
  }

  filterRideList() {
    this.store.select(state => state.ridesSearch.filter)
      .pipe(first())
      .subscribe(filterParameter => {
        this.store.dispatch(new RidesSearch(filterParameter));
      })
  }
}
