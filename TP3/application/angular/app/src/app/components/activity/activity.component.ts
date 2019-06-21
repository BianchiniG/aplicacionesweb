import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ActivityService } from './activity.service';

@Component({
  selector: 'app-activity',
  templateUrl: './activity.component.html',
  styleUrls: ['./activity.component.css']
})
export class ActivityComponent implements OnInit {
  id: String;
  private sub: any;
  activity: any[];
  lat: number = 0;
  long: number = 0;

  constructor(private route: ActivatedRoute, private activityService: ActivityService) { }

  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {
      this.id = params['id'];
    });

    return this.activityService.getActivity(this.id).subscribe(data => this.activity = data);
  }

  ngOnDestroy() {
    this.sub.unsubscribe();
  }
}
