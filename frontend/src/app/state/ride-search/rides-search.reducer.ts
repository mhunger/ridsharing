import { RidesSearchState } from './rides-search.state';
import { RidesSearchSuccess, RidesSearchFailure } from './rides-search.actions';

const defaultRidesSearchState: RidesSearchState = {
  results: null,
  failed: false,
};

export const ridesSearchReducer = (state: RidesSearchState = defaultRidesSearchState, action): RidesSearchState => {
  switch (action.type) {
    case RidesSearchSuccess.type:
      return {
          ...state,
          failed: false,
          results: (action as RidesSearchSuccess).payload,
        };
    case RidesSearchFailure.type:
      return {
        ...state,
        failed: true,
        results: [],
      };
    default:
      return state;
  }
}
