import { RidesSearchState } from './rides-search.state';
import { RidesSearchSuccess, RidesSearchFailure, RidesSearchFilterUpdate } from './rides-search.actions';

const defaultRidesSearchState: RidesSearchState = {
  filter: {},
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
    case RidesSearchFilterUpdate.type:
      return {
        ...state,
        filter: Object.assign(state.filter, (action as RidesSearchFilterUpdate).parameter),
      }
    default:
      return state;
  }
}
