import { Component, Output, EventEmitter } from '@angular/core';
import { RidesSearchFilterUpdate } from '../../state/ride-search/rides-search.actions';
import { Store } from '@ngrx/store';
import { RootState } from '../../state/root.state';

@Component({
  selector: 'filter-panel',
  templateUrl: './filter-panel.component.html',
  styleUrls: ['./filter-panel.component.css']
})
export class FilterPanelComponent {
  public isVisible: boolean;
  @Output() public apply: EventEmitter<void> = new EventEmitter();
  @Output() public hide: EventEmitter<void> = new EventEmitter();
  public tomorrowDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
  public rideSearchFilter$ = this.store.select(state => state.ridesSearch.filter);

  constructor(private store: Store<RootState>) {}

  public onApply() {
    this.apply.emit(null);
  }

  public onHide() {
    this.hide.emit(null);
  }

  public setDepartureFilter(value: string) {
    this.store.dispatch(new RidesSearchFilterUpdate({from: value}));
  }
  public setDestinationFilter(value: string) {
    this.store.dispatch(new RidesSearchFilterUpdate({to: value}));
  }
  public setTravelDayFilter(value: Date) {
    this.store.dispatch(new RidesSearchFilterUpdate({travelDay: this.dateToString(value)}));
  }
  public setSeatsFilter(value: number) {
    this.store.dispatch(new RidesSearchFilterUpdate({seats: value}));
  }

  private dateToString(date: Date) {
    return `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()}`;
  }

}
