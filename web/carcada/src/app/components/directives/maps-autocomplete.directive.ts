import { Directive, ElementRef } from '@angular/core';
import { IAutocomplete } from '../../interfaces/services/GoogleMaps';

@Directive({
    selector: '[mapsAutocomplete]',
})
export class MapsAutocompleteDirective {
    private Autocomplete;
    private field: IAutocomplete;

    constructor(element: ElementRef) {
        this.Autocomplete = window["google"].maps.places.Autocomplete;
        this.field = new this.Autocomplete(element.nativeElement);
    }
}
