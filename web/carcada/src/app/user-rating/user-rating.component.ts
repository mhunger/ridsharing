import {Component, Input, OnInit} from '@angular/core';

@Component({
  selector: 'app-user-rating',
  templateUrl: './user-rating.component.html',
  styleUrls: ['./user-rating.component.css']
})
export class UserRatingComponent implements OnInit {

  @Input() userRating: number;

  constructor() { }

  ngOnInit(

  ) {
  }
}
