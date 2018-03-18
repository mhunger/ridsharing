import { CommonModule } from '@angular/common';
import { LocationFieldComponent, RadiusSelectionList } from './form-fields/location-field/location-field.component';
import { DatePickerFieldComponent } from './form-fields/date-picker-fields/date-picker-field.component';
import { MapsAutocompleteDirective } from './directives/maps-autocomplete.directive';
import { NgModule } from '@angular/core'
import { MatDialogModule } from '@angular/material'
import { MatInputModule, MatFormFieldModule } from '@angular/material'
import { MatMomentDateModule } from '@angular/material-moment-adapter';
import { MatDatepickerModule } from '@angular/material/datepicker'
import { MatDatepickerIntl, MAT_DATEPICKER_SCROLL_STRATEGY_PROVIDER } from '@angular/material/datepicker';

@NgModule({
    declarations: [
        LocationFieldComponent,
        DatePickerFieldComponent,
        MapsAutocompleteDirective,
        RadiusSelectionList,
    ],
    imports: [
        CommonModule,
        MatDialogModule,
        MatDatepickerModule,
        MatMomentDateModule,
        MatInputModule,
        MatFormFieldModule,
        ],
    entryComponents: [],
    exports: [
        LocationFieldComponent,
        DatePickerFieldComponent,
        MapsAutocompleteDirective,
    ],
    providers: [
        MatDatepickerIntl,
        MAT_DATEPICKER_SCROLL_STRATEGY_PROVIDER,
    ]
})
export class ComponentsModule {}
