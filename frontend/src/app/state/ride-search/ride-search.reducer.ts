import { SearchRidesState } from './ride-search.state';
import { RidesSearchSuccess } from './ride-search.actions';

export const searchRidesReducer = (state: SearchRidesState, action): SearchRidesState => {
  switch (action.type) {
    case RidesSearchSuccess.type:
      return {
          ...state,
          results: (action as RidesSearchSuccess).payload,
        };
      default:
        return state;
  }
}
