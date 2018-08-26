import { Component, Input } from '@angular/core';
import { FeatureIconType } from './feature-icon.types';

export enum IconSize {
  Small= "small",
  Medium= "medium",
  Large= "large",
}

@Component({
  selector: 'feature-icon',
  templateUrl: 'feature-icon.component.html',
  styleUrls: ['feature-icon.component.css'],
})
export class FeatureIconComponent {
  @Input() public type: FeatureIconType;
  @Input() public circle: boolean = true;
  @Input() public size: IconSize = IconSize.Small;
}
