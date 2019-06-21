import { DataService } from './data.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  activities$: any[];

  constructor(private dataService: DataService) {}

  ngOnInit() {
    return this.dataService.getActivities().subscribe(data => this.activities$ = data);
  }

}
