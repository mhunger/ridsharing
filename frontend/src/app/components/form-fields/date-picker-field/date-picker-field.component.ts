import { Component, Input } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
    selector: 'date-picker-field',
    templateUrl: 'date-picker-field.component.html',
    styleUrls: ['date-picker-field.component.css'],
})
export class DatePickerFieldComponent {
    @Input() label: string;
    @Input() placeholder: string;
    datePickerFormGroup = new FormGroup({
      initialDate: new FormControl(
          new Date(new Date().getTime() + 24 * 60 * 60 * 1000)
        ),
    });
}
