import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { RideDetailsComponent } from './ride-details/ride-details.component';
import { RideFormComponent } from './ride-form/ride-form.component';
import { RideListComponent } from './ride-list/ride-list.component';
import { RideService } from "./ride-list/rides.service";
import { StarRating } from './shared/star-rating/star-rating.component';
import { LayoutHeaderComponent } from "./shared/layout-header/layout-header.component";
import { SubmitButtonComponent } from "./shared/submit-button/submit-button.component";

@NgModule({
  declarations: [
    AppComponent,
    LayoutHeaderComponent,
    RideListComponent,
    RideDetailsComponent,
    RideFormComponent,
    StarRating,
    SubmitButtonComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot([
      {
        path: '',
        redirectTo: 'rides',
        pathMatch: 'full'
      },
      {
        path: 'rides',
        component: RideListComponent
      },
      {
        path: 'rides/details',
        component: RideDetailsComponent
      },
      {
        path: 'rides/create',
        component: RideFormComponent
      }
    ])
  ],
  providers: [ RideService ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
