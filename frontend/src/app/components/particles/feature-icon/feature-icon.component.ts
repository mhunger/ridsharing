import { Component, Input } from '@angular/core';

@Component({
  selector: 'feature-icon',
  templateUrl: 'feature-icon.component.html',
  styleUrls: ['feature-icon.component.css'],
})
export class FeatureIconComponent {
  @Input() public type: string;
}
