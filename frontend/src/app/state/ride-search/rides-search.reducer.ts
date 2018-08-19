import { RidesSearchState } from './rides-search.state';
import { RidesSearchSuccess } from './rides-search.actions';

const defaultRidesSearchState: RidesSearchState = {
  results: null,
};

export const ridesSearchReducer = (state: RidesSearchState = defaultRidesSearchState, action): RidesSearchState => {
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
