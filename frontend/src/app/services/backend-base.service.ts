import { Http, RequestOptionsArgs } from "@angular/http";

export class BackendBaseService {
  private basePath: string;

  constructor(protected http: Http,
              servicePath: string) {
    if (!servicePath.match(/^\//)) {
      console.error('Error: servicePath needs to start with a slash.');
    }
    this.basePath = `/api${servicePath}`;
  }

  protected get(payload: RequestOptionsArgs) {
    return this.http.get(`${this.basePath}`, payload);
  }

  protected delete(payload: any) {
    return this.http.delete(`${this.basePath}`, payload);
  }

  protected post(payload: any) {
    return this.http.post(`${this.basePath}`, payload);
  }
}
