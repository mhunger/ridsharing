import { Component, Input } from '@angular/core';

@Component({
  selector: 'star-rating',
  templateUrl: './star-rating.component.html',
  styleUrls: ['./star-rating.component.css']
})
export class StarRating {
  @Input() rating: number;
  stars: Array<any>;

  ngOnInit() {
    const roundedRating = Math.round(this.rating);
    this.stars = new Array(roundedRating);
  }
}
