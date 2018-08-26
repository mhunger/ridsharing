import { Component, OnInit } from '@angular/core';
import { Ride } from '../models/Ride';
import { FeatureIconType } from '../components/particles/feature-icon/feature-icon.types';

@Component({
  selector: 'app-ride-details',
  templateUrl: './ride-details.component.html',
  styleUrls: ['./ride-details.component.css']
})
export class RideDetailsComponent implements OnInit {

  public ride: Ride = <any>{};
  public featureIconType = FeatureIconType;

  constructor() {
    this.ride.id = 1;
  }

  ngOnInit() {}
}
