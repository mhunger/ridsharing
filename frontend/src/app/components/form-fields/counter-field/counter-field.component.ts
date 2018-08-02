import { Component, Input } from '@angular/core';

@Component({
    selector: 'counter-field',
    styleUrls: ['counter-field.component.css'],
    templateUrl: 'counter-field.component.html',
})
export class CounterFieldComponent {
    @Input() minimum: number;
    @Input() maximum: number;
    @Input() label: string;

    @Input() value: number;

    ngOnInit() {
        this.value = parseInt(<any>this.value);
        this.maximum = parseInt(<any>this.maximum);
        this.minimum = parseInt(<any>this.minimum);
    }

    increase() {
        if (this.value >= this.maximum) {
            return;
        }
        this.value += 1;
    }

    decrease() {
        if (this.value <= this.minimum) {
            return;
        }
        this.value -= 1;
    }
}
