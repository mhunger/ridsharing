import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { RouterModule } from '@angular/router';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { StoreModule } from '@ngrx/store';
import { StoreDevtoolsModule } from '@ngrx/store-devtools';
import { EffectsModule } from '@ngrx/effects';
import { APP_DATE_FORMATS, AppDateAdapter } from './AppDateAdapter';
import { AppComponent } from './app.component';
import { RideDetailsComponent } from './ride-details/ride-details.component';
import { RideFormComponent } from './ride-form/ride-form.component';
import { RideListComponent } from './ride-list/ride-list.component';
import { FilterPanelComponent } from './components/filter-panel/filter-panel.component';
import { RidesSearchService } from "./services/rides-search.service";
import { LayoutHeaderComponent } from "./shared/layout-header/layout-header.component";
import { SubmitButtonComponent } from "./shared/submit-button/submit-button.component";

import { ComponentsModule } from './components/components.module';
import { MatSelectModule, MatButtonModule, DateAdapter, MAT_DATE_FORMATS } from '@angular/material';
import { ridesSearchReducer } from './state/ride-search/rides-search.reducer';
import { RidesSearchEffects } from './state/ride-search/rides-search.effects';

const reducerMap = {
  ridesSearch: ridesSearchReducer,
};

@NgModule({
  declarations: [
    AppComponent,
    LayoutHeaderComponent,
    RideListComponent,
    FilterPanelComponent,
    RideDetailsComponent,
    RideFormComponent,
    SubmitButtonComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    ComponentsModule,
    BrowserAnimationsModule,
    MatSelectModule,
    MatButtonModule,
    StoreModule.forRoot(reducerMap),
    StoreDevtoolsModule.instrument({
      maxAge: 25,
    }),
    EffectsModule.forRoot([
      RidesSearchEffects,
    ]),
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
        path: 'rides/view/:id',
        component: RideDetailsComponent
      },
      {
        path: 'rides/create',
        component: RideFormComponent
      }
    ])
  ],
  providers: [
    RidesSearchService,
    {
      provide: DateAdapter,
      useClass: AppDateAdapter,
    },
    {
      provide: MAT_DATE_FORMATS,
      useValue: APP_DATE_FORMATS,
    }
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }
