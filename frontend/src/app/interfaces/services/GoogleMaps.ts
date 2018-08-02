export interface IAutocomplete {
    /**
     * Interface for Google Maps API:
     * https://developers.google.com/maps/documentation/javascript/3.exp/reference?hl=de#Autocomplete
     */
    new(inputField: any, opts?: IAutocompleteOptions);
    getBounds();
    getPlace();
    setBounds();
    setComponentRestrictions();
    setOptions(options: IAutocompleteOptions);
    setTypes(types: Array<string>);
}

export interface IAutocompleteOptions {
    bounds?;
    componentRestrictions?;
    placeIdOnly?: boolean;
    strictBounds?: boolean;
    types?: Array<string>;
}