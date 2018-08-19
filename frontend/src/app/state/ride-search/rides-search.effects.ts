import { Injectable } from "@angular/core";
import { RidesSearchService } from '../../services/rides-search.service';
import { Effect, Actions } from "@ngrx/effects";
import { RidesSearch, RidesSearchSuccess, RidesSearchFailure } from "./rides-search.actions";
import { Observable } from 'rxjs';
import { of as observableOf } from 'rxjs';
import { switchMap, map, catchError } from 'rxjs/operators';

@Injectable()
export class RidesSearchEffects {
  constructor(private actions$: Actions,
              private rideService: RidesSearchService) {
  }

  @Effect() search$: Observable<RidesSearchFailure|RidesSearchSuccess> = this.actions$
    .ofType(RidesSearch.type)
    .pipe(
      switchMap(({payload}: RidesSearch) =>
        this.rideService.findRides(payload)
          .pipe(
            map((response) => new RidesSearchSuccess(response.json())),
            catchError(() => observableOf(new RidesSearchFailure())
          ))
      )
    );
}
