import { Http } from "@angular/http";

export class BackendBaseService {
  private basePath: string;

  constructor(protected http: Http,
              servicePath: string) {
    if (!servicePath.match(/^\//)) {
      console.error('Error: servicePath needs to start with a slash.');
    }
    this.basePath = `/api${servicePath}`;
  }

  protected get(path: string, payload: any) {
    return this.http.get(`${this.basePath}${path}`, payload);
  }

  protected delete(path: string, payload: any) {
    return this.http.delete(`${this.basePath}${path}`, payload);
  }

  protected post(path: string, payload: any) {
    return this.http.post(`${this.basePath}${path}`, payload);
  }
}
