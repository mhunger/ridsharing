import { Directive, ElementRef, Input } from '@angular/core';
import { IAutocomplete } from '../../interfaces/services/GoogleMaps';

/**
 * Autocomplete mechanism for textfield
 * based on Google Maps web service
 */
@Directive({
    selector: '[mapsAutocomplete]',
})
export class MapsAutocompleteDirective {
    private Autocomplete;
    private field: IAutocomplete;
    private element: any;
    @Input() placeholderText: string;

    constructor(element: ElementRef) {
        this.element = element.nativeElement;

        if (this.placeholderText) {
          this.element.setAttribute('placeholder', this.placeholderText);
        }

        this.Autocomplete = window["google"].maps.places.Autocomplete;
        this.field = new this.Autocomplete(this.element);
    }
}
