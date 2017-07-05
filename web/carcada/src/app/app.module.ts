import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { RideListComponent } from './ride-list/ride-list.component';
import { UserRatingComponent } from './user-rating/user-rating.component';
import {RideService} from "./ride-list/rides.service";

@NgModule({
  declarations: [
    AppComponent,
    RideListComponent,
    UserRatingComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot([
      {
        path: 'rides',
        component: RideListComponent
      }
    ])
  ],
  providers: [RideService],
  bootstrap: [AppComponent]
})
export class AppModule { }
