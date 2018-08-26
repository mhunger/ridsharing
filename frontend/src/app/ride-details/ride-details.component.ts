import { Component, OnInit } from '@angular/core';
import { Ride } from '../models/Ride';
import { FeatureIconType } from '../components/particles/feature-icon/feature-icon.types';
import { IconSize } from '../components/particles/feature-icon/feature-icon.component';
import { ActivatedRoute } from '@angular/router';
import { first, filter } from 'rxjs/operators';
import { Store } from '@ngrx/store';
import { RootState } from '../state/root.state';

@Component({
  selector: 'app-ride-details',
  templateUrl: './ride-details.component.html',
  styleUrls: ['./ride-details.component.css']
})
export class RideDetailsComponent implements OnInit {

  public ride: Ride = <any>{};
  public featureIconType = FeatureIconType;
  public largeIcon = IconSize.Large;

  constructor(private route: ActivatedRoute,
              private store: Store<RootState>) {}

  ngOnInit() {
    this.route.params.pipe(first()).subscribe(params => {
      const rideId = params.id;
      this.store.select(state => state.ridesSearch.results)
        .pipe(
          filter(results => results !== null),
          first(),
        )
        .subscribe(rides => {
          if (!rides) return;
          this.ride = rides.find(ride => ride.id === rideId);
        });
    });
  }
}
