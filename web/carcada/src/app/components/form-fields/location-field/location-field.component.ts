import { Component, Input } from '@angular/core';

@Component({
    selector: "location-field",
    templateUrl: "location-field.component.html",
    styleUrls: ["location-field.component.css"],
})
export class LocationFieldComponent {
    @Input() label: string;
}
