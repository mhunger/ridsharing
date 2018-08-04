import { Component, Input, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';

@Component({
    selector: 'date-picker-field',
    templateUrl: 'date-picker-field.component.html',
    styleUrls: ['date-picker-field.component.css'],
})
export class DatePickerFieldComponent implements OnInit {
    @Input() label: string;
    @Input() placeholder: string;
    @Input() initialDate;
    selectedDateFormControl = new FormControl();
    datePickerFormGroup = new FormGroup({
      selectedDate: this.selectedDateFormControl,
    });

    ngOnInit() {
      if(this.initialDate){
        this.selectedDateFormControl.setValue(this.initialDate);
      } else {
        this.selectedDateFormControl.setValue(new Date()));
      }
    }
}
