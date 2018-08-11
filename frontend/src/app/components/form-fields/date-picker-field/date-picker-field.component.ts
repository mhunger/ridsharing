import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
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
    @Output() change: EventEmitter<Date> = new EventEmitter<Date>();
    selectedDateFormControl = new FormControl();
    datePickerFormGroup = new FormGroup({
      selectedDate: this.selectedDateFormControl,
    });

    ngOnInit() {
      if(this.initialDate){
        this.selectedDateFormControl.setValue(this.initialDate);
      } else {
        this.selectedDateFormControl.setValue(new Date());
      }
    }

    onChange(date: Date) {
      this.change.emit(date);
    }
}
