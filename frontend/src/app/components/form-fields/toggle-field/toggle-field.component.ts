import { Component, Input } from '@angular/core';

@Component({
    selector: 'toggle-field',
    styleUrls: ['toggle-field.component.css'],
    templateUrl: 'toggle-field.component.html',
})
export class ToggleFieldComponent {
    @Input() label : string;
    @Input() description : string;
}
