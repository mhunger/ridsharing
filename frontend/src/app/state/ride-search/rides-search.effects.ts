import { Injectable } from "@angular/core";
import { RidesSearchService } from '../../services/rides-search.service';
import { Store } from "@ngrx/store";
import { Effect, Actions } from "@ngrx/effects";
import { RidesSearch, RidesSearchSuccess, RidesSearchFailure } from "./rides-search.actions";
import { Observable } from 'rxjs';
import { of as observableOf } from 'rxjs';
import { switchMap, map, catchError } from 'rxjs/operators';
import { RootState } from "../root.state";

@Injectable()
export class RidesSearchEffects {
  constructor(private actions$: Actions,
              private store: Store<RootState>,
              private rideService: RidesSearchService) {
  }

  @Effect() search$: Observable<RidesSearchFailure|RidesSearchSuccess> = this.actions$
    .ofType(RidesSearch.type)
    .pipe(
      switchMap(({payload}: RidesSearch) =>
        this.rideService.findRides(payload)
          .pipe(map(
            response => new RidesSearchSuccess(response.json()),
            catchError(() => observableOf(new RidesSearchFailure()))
          ))
      )
    );
}
