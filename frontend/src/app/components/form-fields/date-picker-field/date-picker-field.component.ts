import { Component, Input } from '@angular/core';
import { MatDatepickerModule } from '@angular/material/datepicker';

@Component({
    selector: 'date-picker-field',
    templateUrl: 'date-picker-field.component.html',
    styleUrls: ['date-picker-field.component.css'],
})
export class DatePickerFieldComponent {
    @Input() label: string;
}
