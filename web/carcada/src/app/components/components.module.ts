import { CommonModule } from '@angular/common';
import { LocationFieldComponent, RadiusSelectionList } from './form-fields/location-field/location-field.component';
import { DatePickerFieldComponent } from './form-fields/date-picker-field/date-picker-field.component';
import { MapsAutocompleteDirective } from './directives/maps-autocomplete.directive';
import { NgModule } from '@angular/core'
import { MatDialogModule } from '@angular/material'
import { MatInputModule, MatFormFieldModule } from '@angular/material'
import { MatMomentDateModule } from '@angular/material-moment-adapter';
import { MatSlideToggleModule } from '@angular/material/slide-toggle';
import { MatDatepickerModule } from '@angular/material/datepicker'
import { MatDatepickerIntl, MAT_DATEPICKER_SCROLL_STRATEGY_PROVIDER } from '@angular/material/datepicker';
import { ToggleFieldComponent } from './form-fields/toggle-field/toggle-field.component';

@NgModule({
    declarations: [
        LocationFieldComponent,
        DatePickerFieldComponent,
        MapsAutocompleteDirective,
        RadiusSelectionList,
        ToggleFieldComponent,
    ],
    imports: [
        CommonModule,
        MatDialogModule,
        MatDatepickerModule,
        MatMomentDateModule,
        MatInputModule,
        MatFormFieldModule,
        MatSlideToggleModule,
    ],
    entryComponents: [],
    exports: [
        LocationFieldComponent,
        DatePickerFieldComponent,
        MapsAutocompleteDirective,
        ToggleFieldComponent,
    ],
    providers: [
        MatDatepickerIntl,
        MAT_DATEPICKER_SCROLL_STRATEGY_PROVIDER,
    ]
})
export class ComponentsModule {}
