import { CommonModule } from '@angular/common';
import { LocationFieldComponent } from './form-fields/location-field/location-field.component';
import { MapsAutocompleteDirective } from './directives/maps-autocomplete.directive';
import { NgModule } from '@angular/core'

@NgModule({
    declarations: [
        LocationFieldComponent,
        MapsAutocompleteDirective,
    ],
    imports: [
        CommonModule,
    ],
    exports: [
        LocationFieldComponent,
        MapsAutocompleteDirective,
    ],
})
export class ComponentsModule {}
