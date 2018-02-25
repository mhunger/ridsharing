import { CommonModule } from '@angular/common';
import { LocationFieldComponent, RadiusSelectionList } from './form-fields/location-field/location-field.component';
import { MapsAutocompleteDirective } from './directives/maps-autocomplete.directive';
import { NgModule } from '@angular/core'
import { MatDialogModule } from '@angular/material'

@NgModule({
    declarations: [
        LocationFieldComponent,
        MapsAutocompleteDirective,
        RadiusSelectionList,
    ],
    imports: [
        CommonModule,
        MatDialogModule,
    ],
    entryComponents: [
        RadiusSelectionList,
    ],
    exports: [
        LocationFieldComponent,
        MapsAutocompleteDirective,
    ],
})
export class ComponentsModule {}
